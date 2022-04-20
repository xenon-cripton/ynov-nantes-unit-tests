FROM codeceptjs/codeceptjs:3.0.7

WORKDIR /tests

COPY .dockerfile/codecept.entrypoint.sh /usr/local/bin/

ENTRYPOINT ["codecept.entrypoint.sh"]