FROM ubuntu:16.04

ARG user=sysadmin

RUN apt-get update

RUN apt-get install -y \
    openssh-server \
    vim \
    iputils-ping \
    man \
    sudo

# ssh
RUN mkdir /var/run/sshd
RUN echo 'root:root' | chpasswd
RUN sed -ri 's/^PermitRootLogin\s+.*/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -ri 's/UsePAM yes/#UsePAM yes/g' /etc/ssh/sshd_config

# user account
RUN adduser --gecos "" $user --disabled-password
RUN echo "$user:$user" | chpasswd
RUN adduser $user sudo

## vim setup
COPY .exrc /root
COPY .exrc /home/$user/
RUN chown $user:$user /home/$user/.exrc

# locales
RUN locale-gen es_ES.UTF-8
COPY locale /etc/default/locale
RUN chmod 0755 /etc/default/locale
ENV LC_ALL=es_ES.UTF-8 LANG=es_ES.UTF-8 LANGUAGE=es_ES.UTF-8

CMD    ["/usr/sbin/sshd", "-D"]
