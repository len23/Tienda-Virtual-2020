<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    echo '<p>Hello World</p>';
    $target = mktime(0, 0, 0, 9, 30, 2012);
    $today = time();
    $difference = ($target-$today);
    $days = (int) ($difference/86400);
    print "Our event will occur in $days days";
  ?>
  <h2>Strings</h2>
  <?php 
    echo '<p> This is a string </p>';
    echo "<p> This is a string </p>";
    //both output the same thing
    $icecream = "chocolate";
    echo '<p> I like $icecream icream</p>'; // prints I like $icecream ice cream
    echo "<p>I like $icecream icecream</p>"// prints I like chocolate ice cream
  ?>
</body>
</html>