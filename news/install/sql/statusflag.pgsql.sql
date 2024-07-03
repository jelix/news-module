ALTER TABLE %%PREFIX%%news ADD COLUMN online_status INT DEFAULT 0;
UPDATE %%PREFIX%%news SET online_status=1;
