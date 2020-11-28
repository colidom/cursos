from mysql import DB


class VirtualMachine:

    def __init__(self, id):
        self.db = DB("carlos", "1234567890", "vmweb")
        sql = f"select * from vmachine where id={id}"
        results = self.db.query(sql)
        self.id = results[0]["id"]
        self.name = results[0]["name"]
        self.ram = results[0]["ram"]
        self.cpu = results[0]["cpu"]
        self.hdd = results[0]["hdd"]
        self.os = results[0]["os"]
        self.status = 0

    def stop(self):
        self.status = 0
        sql = f"update vmachine set status=0 where id={self.id}"
        self.db.run(sql)
        sql = f"delete from process where vmachine_id={self.id}"

    def start(self):
        self.status = 1
        sql = f"update vmachine set status=1 where id={self.id}"
        self.db.run(sql)

    def suspend(self):
        sql = f"update vmachine set status=2 where id={self.id}"
        self.db.run(sql)

    def reboot(self):
        self.stop()
        self.start()

    def get_process(self):
        sql = f"select * from process where vmachine_id={self.id}"
        return self.db.query(sql)

    def run(self, pid, ram, cpu, hdd):
        sql = f"insert into process (pid, ram, cpu, hdd, vmachine_id) values ({pid}, {ram}, {cpu}, {hdd}, {self.id})"
        self.db.run(sql)

    def ram_usage(self):
        ram = 0
        for p in self.get_process():
            ram += p["ram"]
        return ram * 100 / self.ram

    def cpu_usage(self):
        cpu = 0
        for p in self.get_process():
            cpu += p["cpu"]
        return round((cpu * 100 / self.cpu), 2)

    def hdd_usage(self):
        hdd = 0
        for p in self.get_process():
            hdd += p["hdd"]
        return hdd * 100 / self.hdd

    def get_status(self):
        sql = f"select status from vmachine where id={self.id}"
        query = self.db.query(sql)
        status = query[0]["status"]
        if status == 0:
            return "Stopped"
        elif status == 1:
            return "Running"
        elif status == 2:
            return "Suspended"

    def __str__(self):
        return """
{} <{}> [{}]
{:.2f}% RAM used | {:.2f}% CPU used | {:.2f}% HDD used
        """.format(
            self.os,
            self.name,
            self.get_status(),
            self.ram_usage(),
            self.cpu_usage(),
            self.hdd_usage()
        )
