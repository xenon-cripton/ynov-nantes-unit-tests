

const { defineFeature, loadFeature } = require('jest-cucumber');

const feature = loadFeature('./features/basic.feature');

const {Shop, Item} = require("../src/gilded_rose");

defineFeature(feature, test => {
  let inputItems = [];
  let outputItems = [];

  beforeEach(() => {
    inputItems = [];
    outputItems = [];
  });

  test('sellIn should decrease:', ({ given, when, then }) => {
    given('I have an Item:', (table) => {
      table.forEach(row => {
        inputItems.push(new Item(
          row.Name,
          row.SellIn,
          row.Quality,
        ));
      });
    });

    when('a day pass', () => {
      const gildedRose = new Shop(inputItems);
      outputItems = gildedRose.updateQuality();
    });

    then('my item should be like:', table => {

      table.forEach((row, index) => {
        expect(outputItems[index].name).toBe(row.Name);
	      expect(outputItems[index].sellIn).toBe(parseInt(row.SellIn, 10));
	      expect(outputItems[index].quality).toBe(parseInt(row.Quality, 10));
      });
    });
  });

  test('quality can\'t be less than 0:', ({ given, when, then }) => {
    given('I have an Item:', (table) => {
      table.forEach(row => {
        inputItems.push(new Item(
          row.Name,
          row.SellIn,
          row.Quality,
        ));
      });
    });

    when('a day pass', () => {
      const gildedRose = new Shop(inputItems);
      outputItems = gildedRose.updateQuality();
    });

    then('my item should be like:', table => {

      table.forEach((row, index) => {
        expect(outputItems[index].name).toBe(row.Name);
	      expect(parseInt(outputItems[index].sellIn, 10)).toBe(parseInt(row.SellIn, 10));
	      expect(parseInt(outputItems[index].quality, 10)).toBe(parseInt(row.Quality, 10));
      });
    });
  });
});
