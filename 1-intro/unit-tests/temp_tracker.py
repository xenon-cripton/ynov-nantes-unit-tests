#!/usr/bin/env python

"""
TempTracker is a class that allow us to record temperatures and to get info from it

We record temperatures in Fahrenheit, so they'll all be in the range 0..110.

"""

class TempTracker(object):
    def __init__(self):
        self.temps : list = []
        self.min_temp : int = -1
        self.max_temp: int = -1
        self.mean_temp: int = -1
        self.uptodate_mean_temp: bool = False

    def insert(self, temp):
        """insert a new temperature in our tracker

        Parameters
        ----------
        temp : int
            an int between 0 and 110
        """
        if not (isinstance(temp, int)):
            raise TypeError('parameter should be an int')
        if temp < 0 or temp > 110:
            raise ValueError('parameter should be within [0..110]')

        # if current temperature is lower than the last recorded, save it
        self.min_temp = temp if self.min_temp == -1 or temp < self.min_temp else self.min_temp

        # if current temperature is higher than the last recorded, save it
        self.max_temp = temp if self.max_temp == -1 or temp > self.max_temp else self.max_temp

        # as we have inserted new element, our mean have changed
        self.uptodate_mean_temp = False

        self.temps.append(temp)

    def get_min(self):
        """return the minimal temperature recorded yet
        Returns
        -------
        int
            the minimal temperature recorded yet
        """
        if self.min_temp == -1:
            raise ValueError('no min temperature recorded')
        return self.min_temp

    def get_max(self):
        """return the maximal temperature recorded yet
        Returns
        -------
        int
            the maximal temperature recorded yet
        """
        if self.max_temp == -1:
            raise ValueError('no max temperature recorded')
        return self.max_temp

    def get_mean(self):
        """return the mean of the temperatures recorded yet
        Returns
        -------
        float
            the mean of the temperatures recorded yet
        """
        # if we already have done this calculation
        if self.uptodate_mean_temp:
            return self.mean_temp
        else:
            if len(self.temps) == 0:
                raise ValueError('no temperature recorded')
            sum_of_temps = 0
            for temp in self.temps:
                sum_of_temps = sum_of_temps + temp
            # registrer this calculation to avoid to do it too often
            self.mean_temp = sum_of_temps / len(self.temps)
            self.uptodate_mean_temp = True
            return self.mean_temp
