INSERT INTO `category` (`cat_ID`, `title`, `body`, `ttl_topics`) VALUES
(1, 'Politics', 'All of your controversial and political questions', 0),
(2, 'Microsoft', 'Company founded by Bill Gates', 0),
(3, 'Apple', 'Company founded by Steve Jobs', 0),
(4, 'Games', 'Any video, card or board games', 0),
(5, 'Health', 'Having an issue with your health?', 0),
(6, 'History', 'History ranging from the beginning of time until the end of it', 0),
(7, 'Education', 'The idea of public or private schooling', 0),
(8, 'Art', 'The arts are of the utmost importance, for they represent our being', 0);


Insert into topic (topic_ID, cat_ID, title, body, ttl_posts) Values
(1,1,'Donald Trump','All things concerning the current President of the United States',0),
(2,1,'Abortion','All things concerning preborn fetus\'',0),
(3,1,'The First Amendment', 'All things concerning the right to free speech',0),
(4,1,'The Second Amendment','All things concerning the right to bear arms',0),
(5,1,'Transgenderism','All things conerning the existence of being transgender',0);

Insert into `post` (post_ID, topic_ID, title, body, ttl_replies) VALUES 
(1,1,'Should we impeach Donald Trump?', 'I think there is no reason to impeach Donald Trump.  I think a phone call to figure out what was going on in the 2016 election and what will be going on in the next election is not a crime.  What do you think?',0);

Insert INTO `user` (user_ID, username, password, email, birthdate, ttl_posts) VALUES
(1, 'Trechubet', 'lol123', 'tblevins1028@starkstate.net', '1997-10-28', 0);

Alter table post
Add user_ID INT(4);

ALTER TABLE `post` CHANGE `title` `title` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
