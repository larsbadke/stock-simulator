# Stock Simulator

Stock-Simulator is a PHP library that simulates stock fake data for you. Whether you need to bootstrap your database, create good-looking XML documents, fill-in your persistence to stress test it, or anonymize data taken from a production service, Stock-Simulator is for you.

Stock-Simulator requires PHP >= 5.3.3.

# Table of Contents

- [Installation](#installation)
- [Basic Usage](#basic-usage)
- [License](#license)


## Installation

```sh
composer require larsbadke/stock-simulator
```

## Basic Usage

Use `new Simulator\Simulator();` to create and initialize the Stock-Simulator, now you can simulate and create random stock quotes.

#### Simulate stock movements
Single movement
```php
<?php

$simulator = new Simulator;

$simulator->drift(0.01);

$simulator->volatility(0.1);

var_dump($simulator->run());

// array(4) { ["open"]=> int(58) ["low"]=> float(57.07) ["high"]=> float(61.33) ["close"]=> float(61.33) }

```

Generates a complete random stock movement like an impulse or a trend

```php
<?php

$simulator = new Simulator;

$simulator->startPrice(50);

$simulator->drift(0);

$simulator->volatility(0.1);

$simulator->run();

for($i=0; $i<20; $i++){

    echo $simulator->close."\n";

    $simulator->run();
}

// 49.56
// 50.79
// 52.61
// 51.73
// 54.72
// 55.99
// 56.43
// 54
// 54.96
// 54.94
// 55.06
// 52.52
// 51.43
// 54.43
// 56.16
// 58.88
// 59.75
// 59.66
// 62.63
// 61.55


```

## License

Stock is released under the MIT Licence. See the bundled LICENSE file for details.
