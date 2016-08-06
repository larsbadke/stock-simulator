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

$simulator = new Simulator\Simulator;

$simulator->drift(0.01);

$simulator->volatility(0.1);

var_dump($simulator->run());

// array(4) { ["open"]=> int(58) ["low"]=> float(57.07) ["high"]=> float(61.33) ["close"]=> float(61.33) }

```

Access to all properties
```php
<?php

$simulator = new Simulator\Simulator;

echo $simulator->date;

echo $simulator->open;

echo $simulator->low;

echo $simulator->high;

echo $simulator->close;
```

Generates a complete random stock movement like an impulse or a trend

```php
<?php

$simulator = new Simulator\Simulator;

$simulator->startPrice(50);

$simulator->startDate('01-01-2000');

$simulator->drift(0.01);

$simulator->volatility(0.1);

for($i=0; $i<20; $i++){

  echo "Date: {$simulator->date} - {$simulator->open} \n";

  $simulator->run();
}

// Date: 01-01-2000 - 50 
// Date: 02-01-2000 - 49.86 
// Date: 03-01-2000 - 48.07 
// Date: 04-01-2000 - 51.08 
// Date: 05-01-2000 - 53.49 
// Date: 06-01-2000 - 53.91 
// Date: 07-01-2000 - 54.96 
// Date: 08-01-2000 - 55.18 
// Date: 09-01-2000 - 55.66 
// Date: 10-01-2000 - 55.19 
// Date: 11-01-2000 - 58.84 
// Date: 12-01-2000 - 59.39 
// Date: 13-01-2000 - 60.93 
// Date: 14-01-2000 - 61.98 
// Date: 15-01-2000 - 65.17 
// Date: 16-01-2000 - 71.59 
// Date: 17-01-2000 - 70.26 
// Date: 18-01-2000 - 68.07 
// Date: 19-01-2000 - 75.51 
// Date: 20-01-2000 - 77.76 


```

## License

Stock is released under the MIT Licence. See the bundled LICENSE file for details.
