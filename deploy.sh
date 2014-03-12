#! /bin/bash

rsync -rvmz app/* nbc.sandbox:/var/app/current/services/location && echo "Deploy complete!!!";