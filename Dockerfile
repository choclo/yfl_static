FROM centos:7.2.1511
MAINTAINER tolivares@gmail.com
ENV HTTP_ROOT=/home/yflstatic

RUN yum install -y epel-release \
&& yum update -y \
&& yum -y install git httpd \
&& git clone https://github.com/choclo/yfl_static.git $HTTP_ROOT
COPY files/vhost.conf /etc/httpd/conf.d/

EXPOSE 80
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
