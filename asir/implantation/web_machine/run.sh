#!/bin/bash

source /home/alu3295/.virtualenvs/vm/bin/activate
uwsgi --ini /home/alu3295/webapps/vm/uwsgi.ini
