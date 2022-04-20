#!/usr/bin/env python

from unittest import TestCase, main
from temp_tracker import TempTracker

"""Tests of the TempTracker class"""


class TempTrackerMethodTests(TestCase):

    def test_insert(self):
        """ test insert method"""
        tempTracker = TempTracker()
        tempTracker.insert(45)

        assert tempTracker.temps is not None
        self.assertEqual(tempTracker.temps, [45])

    def test_insert_outofbound(self):
        """ test insert method with out of bound values"""
        tempTracker = TempTracker()
        self.assertRaises(ValueError, tempTracker.insert, -10)
        self.assertRaises(ValueError, tempTracker.insert, 210)

    def test_insert_wrong_typing(self):
        """ test insert method with wrong type as arg"""
        tempTracker = TempTracker()
        self.assertRaises(TypeError, tempTracker.insert, "210")
        self.assertRaises(TypeError, tempTracker.insert, "string")

    def test_get_min(self):
        """ test get_min method"""
        tempTracker = TempTracker()
        tempTracker.insert(55)
        tempTracker.insert(45)
        tempTracker.insert(50)
        self.assertEqual(tempTracker.get_min(), 45)

    def test_get_min_no_value(self):
        """ test get_min method with no temperature recorded"""
        tempTracker = TempTracker()
        self.assertRaises(ValueError, tempTracker.get_min)

    def test_get_max(self):
        """ test get_max method"""
        tempTracker = TempTracker()
        tempTracker.insert(55)
        tempTracker.insert(45)
        tempTracker.insert(50)
        self.assertEqual(tempTracker.get_max(), 55)

    def test_get_max_no_value(self):
        """ test get_max method with no temperature recorded"""
        tempTracker = TempTracker()
        self.assertRaises(ValueError, tempTracker.get_max)

    def test_get_mean(self):
        """ test get_mean method"""
        tempTracker = TempTracker()
        tempTracker.insert(55)
        tempTracker.insert(45)
        tempTracker.insert(50)
        self.assertEqual(tempTracker.get_mean(), 50.0)

    def test_get_mean_no_value(self):
        """ test get_mean method with no temperature recorded"""
        tempTracker = TempTracker()
        self.assertRaises(ValueError, tempTracker.get_mean)


if __name__ == '__main__':  # run tests if called from command-line
    main()
