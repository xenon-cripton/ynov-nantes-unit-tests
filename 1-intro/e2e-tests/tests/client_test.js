const CLIENT_URL = `/php/client/index.html`;

Feature('Messenger Client');

Scenario('Test if I can send a message', ({ I }) => {
    I.amOnPage(CLIENT_URL);

    I.waitForText('Messages', 3);
    I.wait(5);

    // ensure message creation works
    I.fillField('Username', 'Toma');
    I.fillField('Your message', 'Salut ! Tu vas bien ?');
    I.click('Send');


    I.fillField('Username', 'Benjamin');
    I.fillField('Your message', 'Hello ! Pas trop mal après ce long weekend');
    I.click('Send');

    I.wait(5);

    // ensure we can see the messages
    I.see('Toma');
    I.see('Salut ! Tu vas bien ?');
    I.see('Benjamin');
    I.see('Hello ! Pas trop mal après ce long weekend');

    // delete All messages
    I.click('DELETE');

    I.wait(5);

    // ensure we don't see Toma or Benjamin anymore :(
    I.dontSee('Toma');
    I.dontSee('Benjamin');

});