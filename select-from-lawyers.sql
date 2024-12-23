SELECT * FROM lawyers
WHERE expertise LIKE '%Family Law%'
   OR location LIKE '%New York%';
   SELECT * FROM lawyers
WHERE 
    expertise LIKE '%Family Law%' OR
    location LIKE '%New York%' OR
    professional_credentials LIKE '%LLM%' OR
    professional_memberships LIKE '%American Bar Association%' OR
    bar_memberships LIKE '%New York State Bar%';

