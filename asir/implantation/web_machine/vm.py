class VirtualMachine:

    def __init__(self, name, ram=1, cpu=1.3, hdd=100, os="debian"):
        self.name = name
        self.ram = ram
        self.cpu = cpu
        self.hdd = hdd
        self.os = os
        self.status = 0
        self.proc = list()

    def stop(self):
        self.status = 0
        self.proc = list()

    def start(self):
        self.status = 1

    def suspend(self):
        self.status = 2

    def reboot(self):
        self.stop()
        self.start()

    def run(self, pid, ram, cpu, hdd):
        self.proc.append(
            {
                "pid": pid,
                "ram": ram,
                "cpu": cpu,
                "hdd": hdd
            }
        )

    def ram_usage(self):
        ram = 0
        for p in self.proc:
            ram += p["ram"]
        return ram * 100 / self.ram

    def cpu_usage(self):
        cpu = 0
        for p in self.proc:
            cpu += p["cpu"]
        return cpu * 100 / self.cpu

    def hdd_usage(self):
        hdd = 0
        for p in self.proc:
            hdd += p["hdd"]
        return hdd * 100 / self.hdd

    def get_status(self):
        if self.status == 0:
            return "Stopped"
        elif self.status == 1:
            return "Running"
        elif self.status == 2:
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
