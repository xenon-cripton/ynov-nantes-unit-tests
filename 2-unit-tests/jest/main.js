const { getDataFromAPI } = require('./api');

const { readFile, writeFile, createDir } = require('./fs');
const {
  xmlToJson,
  jsonToXML,
  correctFile,
} = require('./builder');

const OUTPUT_FOLDER = './dist/';

const INPUT_FILE = './source.xml';
const OUTPUT_FILE = './dist/result.xml';

/**
 * Script entry point
 */
exports.main = async () => {
  createDir(OUTPUT_FOLDER);

  const apiData = await getDataFromAPI('myUrl.com');

  console.log('api data : ', apiData);

  const fileContent = readFile(INPUT_FILE);

  const fileInJson = await xmlToJson(fileContent);

  const updatedFile = correctFile(fileInJson);

  writeFile(OUTPUT_FILE, jsonToXML(updatedFile));
};
