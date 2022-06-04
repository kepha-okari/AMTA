            SELECT 
              cnd.id AS candidate_id, 
              cnd.name AS candidate_name, 
              cnd.votes AS votes, cnd.id, 
              cat.name as category, 
              cat.id AS category_id
            FROM candidates cnd
            INNER JOIN
            (
                SELECT `category_id`, MAX(votes) AS max_votes
                FROM candidates
                GROUP BY `category_id`
            ) t2
                ON cnd.`category_id` = t2.`category_id` AND cnd.votes = t2.max_votes
            LEFT JOIN categories cat ON cat.id=cnd.category_id;