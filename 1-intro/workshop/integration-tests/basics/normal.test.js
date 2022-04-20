const { it } = require('@jest/globals');
const { default: jestHoist } = require('babel-plugin-jest-hoist');
const {calculateElectionResults} = require('./normal.js')
const tools = require('./tools.js'); 

const validSet = [20, 5, 10, ['Sasuke Uchiwa', 'Simba du Roi Lion']]
const incorrectSet = ['cold', 'cheap', 'alot', 'youpi']
const invalidSet = [9, 0.5, 30, ['Sasuke Uchiwa', 'Simba du Roi Lion', 'Télécommande']]

it('CalculateElectionResults : Wrong input', () => {

    expect(() =>calculateElectionResults()).toThrow('Incorrect Input');

    for (let i = 0; i < incorrectSet.length; i++) {
        let incorrectDataSet = [...validSet];
        incorrectDataSet[i] = incorrectSet[i];
        expect(() =>calculateElectionResults(...incorrectDataSet)).toThrow('Incorrect Input');
    }

    for (let i = 0; i < invalidSet.length; i++) {
        let invalidDataSet = [...validSet];
        invalidDataSet[i] = invalidSet[i];
        expect(() =>calculateElectionResults(...invalidDataSet)).toThrow('Election canceled');
    }
    
});

it('CalculateElectionResults : All the system working with an expected Octogon result', () => {
    const spy = jest.spyOn(tools, 'octogone').mockReturnValueOnce('Clint Eastwood'); //
    expect(calculateElectionResults(...validSet)).toBe('Clint Eastwood');
})

it('CalculateElectionResults : Real results', () => {
    expect(calculateElectionResults(...validSet)).toBe('Simba du Roi Lion');
});
