## Using aliases

* `y alias new_name old_name` - general alias syntax

Example: create alias for current folder

```
cd /var/www/html
y alias html `pwd`
```

Example: use alias to change folder

```
cd `y alias html`
```

## Copying and downloading files

```
y copy y.php y_test.php
y copy http://www.google.com/ index.html
```

## Network info

```
y gethostname
y gethostbyname google.com
y gethostbyaddr 127.0.0.1
```

## Hashing and encoding

```
y md5 message
y md5_file y.php
```

```
y base64_encode message
y base64_decode dGVzdA==
```

## Random values

```
y rand
y rand 1 6
```

## Timestamp

```
y time
```

## y special commands

* `y y` - returns full path to y.php
* `y y dir` - returns full path to y directory

Usage:

```bash
vi `y y`
```
