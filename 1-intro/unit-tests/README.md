# Python temperature tracker

TempTracker is a class that allow us to record temperatures and to get info from it

We record temperatures in Fahrenheit, so they'll all be in the range 0..110.

# Python flatten

the flatten function is function from the [Numpy lib](https://docs.scipy.org/doc/numpy/reference/generated/numpy.ndarray.flatten.html
).
The flatten function should work this way :
flatten an array of arbitrarily nested arrays of integers into a flat array of integers. e.g. [[1,2,[3]],4] -> [1,2,3,4]

## To run

```bash
# python container
docker-compose up -d
# temp tracker tests
docker-compose exec test-python python temp_tracker_test.py
# flatten tests
docker-compose exec test-python python flatten_test.py
```
