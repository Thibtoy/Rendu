#DECLARE UserId INT;
#DECLARE password VARCHAR(255);

SET @UserId = 3;
#Delete a user but delete his comments before.
DELETE FROM exoBlog.Users WHERE id = @UserId;

SET @UserId = 4;
SET @password = 'lepassword';

UPDATE exoBlog.Users
SET Password = UNHEX(SHA1(@password))
WHERE id = @UserId;

SET @UserId = 1;
SET @password = 'lenouveaupassword';
SET @email = 'lenouvel@email.com';
SET @pseudo = 'lenouveaupseudo';

UPDATE exoBlog.Users
SET Password = UNHEX(SHA1(@password)),
	Pseudo = @pseudo,
	Email = @email
WHERE id = @UserId;
