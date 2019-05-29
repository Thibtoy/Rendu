INSERT INTO exoBlog.Users (Pseudo, Email, Password)
	VALUES 
	('JeanJak', 'JeanJak@gmail.com', UNHEX(SHA1('JeanJakCaiLeMeilleur'))),
	('June', 'December@outlook.fr', UNHEX(SHA1('EnMaiFaisCeKilTePlai'))),
	('MoiMeme', 'JeTuIl@dindon.io', UNHEX(SHA1('LeSupeeerPaassWoooord!'))),
	('Thibtoy', 'Thibtoy@Thibtoy.thibtoy', UNHEX(SHA1('ThibtoyThibtoy?')));

INSERT INTO exoBlog.Category (Name, Description)
	VALUES
	('Sport', 'Des articles où ça parle de marquer des Buts!'),
	('Alimentation', 'T\'a un petit creux?'),
	('Divers', 'Vas-y fais toi plais\' racontes ta life!'),
	('Autres', 'Un peu comme \'Divers\' mais apparemment tu peut raconter d\'autres trucs');

INSERT INTO exoBlog.Articles (Titre, CategoryId, Content, Description, Photo)
	VALUES
	('Panique Sur La Pelouse', 1, 'Quelle ne fût pas la surprise des habitants du magnifique village de Bawl En Vellin, quand ils virent débarquer sur leur pelouse, Mr Jean FutBawl, ancien footballeur professionnel, qui avais quitté les devants de la scéne il y a plus de 30 ans. N\'en faisant qu\'à sa tête, il a forcé les barrières de sécurité pour rejoindre la partie en cours, disputée par les enfants de l\'école de ce village, les parents ont vite fais évacuer leurs enfants du terrain et Mr Jean c\'est retrouvé tout seul à marquer des buts et vociférer contre les tribunes vides. Par respect pour sa carrière passée, les organisateurs de la rencontre ont laissé ce vieux monsieur revivre ses folles années!', 'Un ancien footballeur s\'invite dans une rencotre sportive', ''),
	('Salade et Tacos', 2, 'Je dois dire que c\'est avec un plaisir incommensurable que je vous présentes cet article, en effet je tenais à partager avec vous mon amour des tacos et des salades, je mange parfois des tacos et d\'autres fois des salades, du coup c\'est équilibré, enfin je crois... Oh! Bien sûr je vous vois venir, évidemment je ne mange pas que ça, parfois je mange d\'autres aliments comme des frites ou des tomates, il m\'arrive même parfois de prendre des kebab complets, mais au final, c\'est les tacos et les salades que je préfère!', 'Le régime alimentaire au TOP!', ''),
	('Moi Hubert', 3, 'Bonjour, je m\'appelles Hubert et j\'ai 32 ans je pensais venir me faire des amis ici mais au final je me rends compte que c\'est peut-être pas le meilleur endroit, si vous avez des suggestions ou des conseils je suis preneur, en tout cas je vous remercie d\'accorder du temps à ma demande, si jamais y a des gens qui veulent me contact\' bah je laisse mon 06, c\'est 06 01 02 03 04, voilà voilà a ++ les copains', 'Un endroit pour rencontrer des copains!', ''),
	('La Fonte Du Permafrost', 4, 'Bah voilà, je crois que le titre parles de lui même, le permafrost, il fond, et personne ne s\'en soucis... C\'est triste en vrai, les animaux ils vont mourrir, la température elle vas augmenter, et vous vous êtes là à parler d\'argent, non c\'est vraiment triste mais bon... tout le monde s\'en fout', 'Un truc hyper important dont personne ne se soucis...', '');

INSERT INTO exoBlog.Comments (Comment, ArticleId, UserId)
	VALUES
	('Ouah le ouf, comme quoi il n\'y a pas d\'age pour vivre sa passion', 1, 2),
	('Mais non il c\'est échappé de l\'hôpital c\'est sur', 1, 1),
	('En vrai ça passes regardes il mange des tomates des frites et de la salade, plein de légumes il a raison c\'est saint!', 2, 3),
	('Ouais alors déjà les frites c\'est pas des légumes et ensuite ses repas baignent dans le gras c\'est pas saint...', 2, 4),
	('Ouais bah ... on s\'en fout, moi je veux des grosses bagnoles et des bieres', 4, 1);

INSERT INTO exoBlog.Comments (Comment, ArticleId)
	VALUES
	('Ah ouais mais mec tu vas mourir si tu manges si mal', 2),
	('36 15 gars ...', 3),
	('Sinon y\' a facebook pour les amis toussa...', 3);