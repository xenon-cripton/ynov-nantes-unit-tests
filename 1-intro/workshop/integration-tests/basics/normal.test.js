const { it } = require('@jest/globals');
const { default: jestHoist } = require('babel-plugin-jest-hoist');
const {calculateElectionResults} = require('./normal.js')
const tools = require('./tools.js'); 

it('CalculateElectionResults : Wrong input', () => {

    expect(() =>calculateElectionResults()).toThrow('Incorrect Input');

    expect(() =>calculateElectionResults('cold', 10, 10, ['Sasuke Uchiwa', 'Simba du Roi Lion'])).toThrow('Incorrect Input');
    expect(() =>calculateElectionResults(10, 'cheap', 10, ['Sasuke Uchiwa', 'Simba du Roi Lion'])).toThrow('Incorrect Input');
    expect(() =>calculateElectionResults(10, 0.5, "alot", ['Sasuke Uchiwa', 'Simba du Roi Lion'])).toThrow('Incorrect Input');
    expect(() =>calculateElectionResults(10, 0.5, 22, 'Sasuke Uchiwa')).toThrow('Incorrect Input');

    expect(() =>calculateElectionResults(9, 5, 2, ['Sasuke Uchiwa', 'Simba du Roi Lion'])).toThrow('Election canceled');
    expect(() =>calculateElectionResults(20, 0.5, 2, ['Sasuke Uchiwa', 'Simba du Roi Lion'])).toThrow('Election canceled');
    expect(() =>calculateElectionResults(20, 5, 22, ['Sasuke Uchiwa', 'Simba du Roi Lion'])).toThrow('Election canceled');
    expect(() =>calculateElectionResults(20, 5, 2, ['Sasuke Uchiwa', 'Simba du Roi Lion', "Dora l'exploratrice"])).toThrow('Election canceled');
    
});

it('CalculateElectionResults : All the system working with an expected Octogon result', () => {
    const spy = jest.spyOn(tools, 'octogone').mockReturnValueOnce('Clint Eastwood'); //
    expect(calculateElectionResults(20, 5, 2, ['Sasuke Uchiwa', 'Simba du Roi Lion'])).toBe('Clint Eastwood');
})

it('CalculateElectionResults : Real results', () => {
    expect(calculateElectionResults(20, 5, 2, ['Sasuke Uchiwa', 'Simba du Roi Lion'])).toBe('Simba du Roi Lion');
});
