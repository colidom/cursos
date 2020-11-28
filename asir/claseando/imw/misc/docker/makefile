build:
	docker build --build-arg user=`whoami` -t xenial .
run:
	docker run --privileged -h imw -d -p 22:22 -p 80:80 --name imw xenial
save:
	docker save xenial | gzip -c > /tmp/xenial.tgz
load:
	gunzip -c /tmp/xenial.tgz | docker load
