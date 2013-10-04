App to test Fibonacci algorithms performance: iterative vs recursive.

```
# Test iterative algorithm with n = 30
$ php app.php runner:run 30 iterative
0.000029

$ php app.php runner:run 30 recursive
0.530457

```

Run it on batches for maximum awesomeness:

```
# recursive approach performance ()
for n in $(seq 1 1 45); do php app.php runner:run n recursive >> recursive.log; done;

# iterative performance
for n in $(seq 1 1 45); do php app.php runner:run n iterative >> iterative.log; done;

# join for a nice plotting
join <(nl iterative.log) <(nl recursive.log) | pbcopy

# plot it somewhere

```
 Take a look at bin/plot.html for a nice ploting thanks to google graphs libraries.