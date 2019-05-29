SELECT Category.Name, Articles.Titre, Articles.Content, Articles.Description, 
Articles.Photo, Comments.Comment, Comments.CreatedAt,
Users.Pseudo FROM exoBlog.Articles AS Articles
INNER JOIN exoBlog.Category AS Category
ON Category.id = Articles.CategoryId 
RIGHT JOIN exoBlog.Comments AS Comments
ON Articles.id = Comments.ArticleId
LEFT JOIN exoBlog.Users AS Users
ON Users.id = Comments.UserId
WHERE Category.Name = 'Sport';
 

 