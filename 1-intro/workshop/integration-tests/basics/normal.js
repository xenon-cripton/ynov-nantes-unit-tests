const tools = require('./tools.js');

function calculateElectionResults(temperature, beerPrice, numberOfCatsByHome, candidatsList) {

    if (    typeof temperature != 'number' || 
            typeof beerPrice != 'number' || 
            typeof numberOfCatsByHome != 'number' || 
            !Array.isArray(candidatsList) )  {
        throw new Error('Incorrect Input');
        return;
    }

    if (    temperature < 10 || 
            beerPrice  < 1 || 
            numberOfCatsByHome > 20 || 
            candidatsList.length != 2 ) {
        throw new Error('Election canceled');
        return;
    }

    let winner = tools.octogone(candidatsList[0], candidatsList[1]);
    return winner;
}

module.exports = {calculateElectionResults}