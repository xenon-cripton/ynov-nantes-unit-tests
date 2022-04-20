#!/usr/bin/env python

from unittest import TestCase, main
from flatten import flatten

"""Tests of the flatten function"""

class FlattenTests(TestCase):
    def test_with_null(self):
        """Tests with empty lists"""
        self.assertEqual(flatten([]), [], "Should be []")
        self.assertEqual(flatten([[[]]]), [], "Should be []")

    def test_input_type(self):
        """Tests with invalid arg type"""
        self.assertRaises(TypeError, flatten, 5)
        self.assertRaises(TypeError, flatten, [5.0])
        self.assertRaises(TypeError, flatten, ["5"])
        self.assertRaises(TypeError, flatten, ["string"])

    def test_single_value(self):
        """Tests with a single value in list"""
        self.assertEqual(flatten([5]), [5], "Should be [5]")
        self.assertEqual(flatten([-5]), [-5], "Should be [-5]")

    def test_few_value(self):
        """Tests with a few values in list"""
        self.assertEqual(flatten([1, 2, 3]), [1, 2, 3], "Should be [1, 2, 3]")

    def test_nested_once(self):
        """Tests with lists nested once in list"""
        self.assertEqual(flatten([[5]]), [5], "Should be [5]")
        self.assertEqual(flatten([[-5]]), [-5], "Should be [-5]")
        self.assertEqual(flatten([4, 5, [1, 2, 3]]), [
                         4, 5, 1, 2, 3], "Should be [4, 5, 1, 2, 3]")

    def test_nested_multiple(self):
        """Tests with lists nested few times in list"""
        self.assertEqual(flatten([4, [5, [6, 7]], [1, 2, 3]]), [
                         4, 5, 6, 7, 1, 2, 3], "Should be [4, 5, 6, 7, 1, 2, 3]")

if __name__ == '__main__':  # run tests if called from command-line
    main()
