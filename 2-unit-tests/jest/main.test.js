const {
  describe, expect, test, beforeEach,
} = global;

const fs = require('fs');

const { main } = require('./main');

const consoleSpy = jest.spyOn(console, 'error').mockImplementation();

describe('Integration tests for main', () => {
  beforeEach(() => {
    consoleSpy.mockClear();
  });

  test('Integration test', async () => {
    await main();

    // on s'assure que le fichier result est bien créé
    expect(fs.existsSync('./dist/result.xml')).toBe(true);
    // on s'assure du contenu du fichier
    expect(fs.readFileSync('./dist/result.xml', 'utf8')).toBe(`<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<note>
  <to>Toma</to>
  <from>Benjamin</from>
  <heading>Reminder</heading>
  <body>Nan vraiment, les d'inté, c'était top</body>
</note>`);

    // On verifie qu'on a bien reçu un message d'erreur venant de l'API
    // Et qu'on l'a bien affiché dans la console
    expect(console.error).toBeCalledTimes(1);
    expect(console.error).toHaveBeenLastCalledWith('Could not reach API : "myUrl.com/v1/someurl"');
  });
});
