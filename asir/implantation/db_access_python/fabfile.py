from fabric.api import env, cd, local, run

# nombre de la máquina de producción
env.hosts = ["cloud"]
# env.user
# env.password


def deploy():
    local("git push")
    with cd("~/webapps/vm"):
        run("git pull")
        run("supervisorctl restart vm")
