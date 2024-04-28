This is an application to test the module.

A docker configuration is provided to launch the application into a container.

Before launching containers, you have to run this command:

```
./run-docker build
```

To launch containers, just run `./run-docker`.

The first time you run the containers, you have to initialize the database and
application configuration by executing these commands:

```
./app-ctl reset
```

Then open your browser and go at http://localhost:8540/ .


You can execute some commands into the php container, by using this command:

```
./app-ctl <command>
```

Available commands:

* `reset`: to reinitialize the application 
* `composer-update` and `composer-install`: to update PHP packages 
* `clean-tmp`: to delete temp files 
* `install`: to launch the Jelix installer
* `psql`: to enter into the psql cli

You can also connect to the postgresql server on the port 8541.

You can change port by setting some environment variables. Examples:

```
export TESTAPP_WEB_PORT=8085
export TESTAPP_PGSQL_PORT=5433

./run-docker

```
