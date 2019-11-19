# Coverspector

[![Build Status](https://travis-ci.org/umbrellio/coverspector.svg?branch=master)](https://travis-ci.org/umbrellio/coverspector)
[![Coverage Status](https://coveralls.io/repos/github/umbrellio/coverspector/badge.svg?branch=master)](https://coveralls.io/github/umbrellio/coverspector?branch=master)

This package helps to check that code coverage above minimum value. It can be useful in CI or git hooks.

## Features
 - Fail CI/hook when code coverage is less than minimal value.
 - Print list of uncovered files
 
 
## Installation
Run this command to install:
```bash
composer require umbrellio/coverspector
```
## Usage
Allow coverage toll to print info about uncovered files.
In case of phpunit, add to phpunit config:
```
addUncoveredFilesFromWhitelist="true"
```
In case of codeception:
```yml
show_uncovered: true
```

In your CI, dump coverage output into file
```bash
vendor/bin/codecept run --coverage | tee coverage.txt
```

Than, run coverspector with minimum code coverage value
```bash
vendor/bin/coverspector --file=coverage.txt --min=100
```
If coverage will be less, coverspector will fail the job and print list of all not totaly covered files


## License

Released under MIT License.

## Authors

Created by Makin Vladislav.

## Contributing

- Fork it ( https://github.com/umbrellio/coverspector )
- Create your feature branch (`git checkout -b feature/my-new-feature`)
- Commit your changes (`git commit -am 'Add some feature'`)
- Push to the branch (`git push origin feature/my-new-feature`)
- Create new Pull Request

<a href="https://github.com/umbrellio/">
<img style="float: left;" src="https://umbrellio.github.io/Umbrellio/supported_by_umbrellio.svg" alt="Supported by Umbrellio" width="439" height="72">
</a>
