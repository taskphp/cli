task/cli
========

CLI for Task.

Installation
============

There are 3 options for installation:

#1 Composer global (recommended)
--------------------------------
```bash
$> composer global require task/cli ~0.2
```
If you haven't installed anything this way before you'll need to update your `PATH`:
```bash
export PATH=$PATH:$HOME/.composer/vendor/bin
```

#2 Phar
-------

Download from Github:
```bash
$> wget -O /usr/bin/task https://github.com/task/cli/releases/v0.2.0/task.phar
$> chmod +x /usr/bin/task
```

#3 Composer
-----------
```json
...
"require-dev": {
    "task/cli": "~0.2"
}
...
```
Run at `./vendor/bin/task`.