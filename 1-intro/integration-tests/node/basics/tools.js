function octogone(firstcandidat, secondcandidate) {
    return firstcandidat.length >= secondcandidate.length ? firstcandidat : secondcandidate;
}

module.exports = { octogone }