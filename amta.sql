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

            
update categories set name="Domestic Airline Of The Year", code="DAL"  where id=5;
update categories set name="Long Distance Bus Service Of The Year", code="LDB"  where id=6;
update categories set name="Matatu Sacco Of The Year", code="MSY"  where id=7;
update categories set name="Long Distance Shuttle of The Year", code="LDS"  where id=8;
update categories set name="Matatu of The Year", code="MAT"  where id=9;
update categories set name="Male Driver of the Year", code="MDY"  where id=10;
update categories set name="Female Driver of the Year", code="FDY"  where id=11;
update categories set name="Male Conductor of the Year", code="MMC"  where id=12;
update categories set name="Female Conductor of the Year", code="MFC"  where id=13;
update categories set name="Radio Drive Show Of The Year", code="RADIO"  where id=14;
update categories set name="Forester Nation ", code="FRST"  where id=15;
update categories set name="Volkswagen Owners Club", code="VW"  where id=16;
update categories set name="Nissan Owners Club", code="NSN"  where id=17;
update categories set name="Mazda Owners Club", code="MZD"  where id=18;
update categories set name="Mitsubishi Owners Club", code="MTSB"  where id=19;
update categories set name="BMW Owners Club", code="BMW"  where id=20;
update categories set name="Honda Owners Club", code="HONDA"  where id=60;
update categories set name="Mercedez-Benz Club", code="BENZ"  where id=61;
update categories set name="LAND CRUISER OWNERS (KENYA) OFFICIAL", code="LANDC"  where id=62;
update categories set name="Transport Social Media Page of The Year", code="TRMEDIA"  where id=63;
update categories set name="Male Outstanding Boda Boda Rider Of The Year", code="MBODA"  where id=64;
update categories set name="Female Outstanding Boda Boda Rider Of The Year", code="FBODA"  where id=65;
update categories set name="Transport Infrastructure Of The Year", code="TRANST"  where id=66;
            update categories set name="", code=""  where id=

INSERT INTO candidates (name, votes, status, category_id)
VALUES
('G4S', 0, 1, 3),
('Wells Fargo', 0, 1, 3),
('Posta', 0, 1, 3),
('Roy Parcels Services', 0, 1, 3),
('2NK Parcel Delivery', 0, 1, 3),
('Shujaa Delivery', 0, 1, 3),
('Courier Plus', 0, 1, 3),
('Amarex', 0, 1, 3),
('DHL', 0, 1, 3);


INSERT INTO categories (name, code, status)
VALUES
('Best Technological Innovation in Transport', '', 1),
('Taxi Provider Of The Year', '', 1),
('Courier Service Provider Of The Year', '', 1),
('Haulier/ Logistics Company Of The Year', '', 1),
('Domestic Airline Of The Year', '', 1),
('Long Distance Bus Service Of The Year', '', 1),
('Matatu Sacco Of The Year', '', 1),
('Long Distance Shuttle of The Year', '', 1),
('Matatu of The Year', '', 1),
('Female Driver of the Year', '', 1),
('Male Driver of the Year', '', 1),
('Female Conductor of the Year', '', 1),
('Male Conductor of the Year', '', 1),
('Radio Drive Show Of The Year', '', 1),
('Motor Club Of The Year', '', 1),
('Transport Social Media Page of The Year', '', 1),
('Female Outstanding Boda Boda Rider Of The Year', '', 1),
('Male Outstanding Boda Boda Rider Of The Year', '', 1),
('Female Traffic Police Of The Year', '', 1),
('Male Traffic Police Of The Year', '', 1),
('Transport Infrastructure Of The Year', '', 1),
('Transport Sector Lifetime Achievement', '', 1),
('Outstanding personnel in Road transport', '', 1),
('Outstanding personnel in Maritime transport', '', 1),
('Outstanding personnel in Aviation transport', '', 1),
('Outstanding personnel in Rail transport', '', 1),
('Outstanding personnel in', '', 1),
('', '', 1),
('', '', 1),
('', '', 1),
('', '', 1),
('', '', 1),
('', '', 1);
            