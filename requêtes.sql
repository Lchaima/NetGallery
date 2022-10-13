--q1--
insert into t_news_new values
(NULL,'Net\'Gallery? qu\'est ce que c\'est ?',' Net\'Gallery est une exposition sur l\'évolution de la mode féminine au 20ième siècles , nous vous présentons les oeuvres les plus marquantes du monde de la mode. Des oeuvres réalisées par des créateurs qui ont révolutionné le domaine de Fashion design','2022-01-30','Admin1');

--q2--
SELECT * from t_news_new
where new_date = (select max(new_date) from t_news_new );

--q3--
SELECT new_titre , cpt_pseudo  FROM t_news_new ;

--q4--

SELECT new_id, new_texte , cpt_pseudo  FROM `t_news_new` 
order by new_id DESC 
limit 5 ;


--q5--
UPDATE `t_news_new` SET new_date='2022-02-01' WHERE new_id=2 ;

--q6--
DELETE FROM `t_news_new` WHERE new_id=2 ;


--q7--
delete from t_news_new where new_date < '2022-02-01' ;


--q8--


insert into t_compte_cpt values ('Admin3',MD5('admin3expo22')) ;

insert into t_profil_pfl values 
('Liheouel','Mourad','liheouel.mourad@gmail.com','A','2022-02-24','Admin3');


--q9--
select *
from t_compte_cpt 
join t_profil_pfl using(cpt_pseudo)
where cpt_pseudo='Admin2'
and cpt_mot_de_passe=MD5('admin2expo22')
and pfl_validite='A' ;

--q10--
select * from t_profil_pfl 
where cpt_pseudo='gEstionnaire' ;

--q11--
select pfl_role from t_profil_pfl 
where pfl_nom='Dubois' and pfl_prenom='Sarah' ;

--q12--
UPDATE `t_profil_pfl` SET `pfl_email`='Lmourad67@gmail.com',`pfl_validite`='D';
WHERE cpt_pseudo='Admin3' ;

--q13--
UPDATE `t_compte_cpt` SET `cpt_mot_de_passe`=MD5('Admin2@expo22') WHERE cpt_pseudo='Admin2';

--q14--
select * from t_profil_pfl join t_compte_cpt using (cpt_pseudo);

--q15--

UPDATE `t_profil_pfl` SET `pfl_validite`='D' WHERE cpt_pseudo='Admin3';

UPDATE `t_profil_pfl` SET `pfl_validite`='A' WHERE cpt_pseudo='Admin3';

--q16--
insert into t_configuration_con VALUES 
 ('exposition sur l\'évolution de la mode féminine au 20ième siècles','2022-02-01','2022-05-01','des oeuvres de différents créateurs de mode seront exposées à la galerie','Le centre national d’art et de culture Georges-Pompidou','2022-02-01 10:00:00.000000','on attend votre visite!');
 
--q17--
select count(*) as nombre_de_ligne, from t_configuration_con ;

--q18--
SELECT *,(datediff(CURRENT_DATE(),con_date_vernissage))as nombre_jours_passes FROM `t_configuration_con`;
--q19--
UPDATE `t_configuration_con` SET `con_intitule`='La mode féminine au XXe siècle',`con_lieu`= 'Le centre national d\’art et de culture Georges-Pompidou',`con_date_vernissage`='2022-02-01 11:00:00.000000'  ;

--q20----
DELETE FROM `t_configuration_con` ;

--q21--
insert into t_visiteur_vis VALUES
(NULL,'vis123_exp2022!','2022-02-02 15:30:45.999999','liheouel','chaima','chaima.liheouel@gmail.com','Admin1');

--q22-

select vis_id , vis_mail , cmt_texte FROM
t_visiteur_vis
left outer join t_commentaire_cmt using (vis_id);

--q23--

delete from t_commentaire_cmt where vis_id=6;
delete from t_visiteur_vis where vis_id=6 ;

--q24-- 

set @nb1=(select count(vis_id) from t_visiteur_vis where vis_id not in ( select vis_id from t_commentaire_cmt)) ;
set @nb_total=(select count(vis_id) from t_visiteur_vis) ;

select (@nb1/@nb_total)*100 as pourcentage;

--q25--

set @id_3h_ok = (select vis_id
from t_visiteur_vis
where vis_date <= now() and now() <= TIMESTAMPADD(HOUR,3,vis_date)
and  vis_id=8 ;

select @id_3h_ok ;

update t_visiteur_vis set vis_mail='J.Janet2001@gmail.com' where vis_id=8 and   vis_mot_de_passe='8vis12_exp2022!' and @id_3h_ok is not null ;

insert into t_commentaire_cmt values (NULL,now()'it was one of my favourit expo i have ever been',8,'P');
select NULL,'ceci est un test',NOW() ,'P', 8 from DUAL 
where @id_3h_ok is not NULL
--q26--

UPDATE `t_commentaire_cmt` SET `cmt_etat`='C' WHERE vis_id=3 ;

--q27--
SELECT * FROM `t_commentaire_cmt` WHERE cmt_etat='P' ;

--q28--
SELECT cmt_texte , vis_mail from t_commentaire_cmt join t_visiteur_vis using (vis_id) ;

--q29--

--suppression--
DELETE FROM t_commentaire_cmt where com_id in (select com_id from t_commentaire_cmt join t_visiteur_vis using (vis_id)  where vis_id=8 and vis_mot_de_passe='8vis12_exp2022!' ) ;

--modification--
UPDATE t_commentaire_cmt join t_visiteur_vis using (vis_id) SET `cmt_date_heure`='2022-02-02 11:32:45',`cmt_texte`='It was inspiring, i really liked it ' WHERE vis_id=3 and vis_mot_de_passe="3vis12_exp2022!";

--q30--

insert into t_oeuvre_oev values (NULL,'alaiaXtati',1991,'c\'est une combinaison de la collaboration de la maison Alaia avec la marque de distribution TATI. la pièce est faite de tissu avec un gros motif pied-de-coq rose et blanc célèbre de la marque Tati.Ce motif, associé à certains quartiers populaires où la vie de la rue était vivante et animée.','‪C:\Users\USER\L2_info_S4\dvp_application_web\images\oeuvres\alaia-tati.png'); 

--q31--

select oev_intitule , oev_description, substring(oev_image,61) as nom_image from t_oeuvre_oev ;

--q32--

select * from t_oeuvre_oev where oev_id=10 ;

--q33--

SELECT exp_nom , exp_text_biographique , exp_URL , substring(exp_image,63) as nom_image FROM `t_exposant_exp` ;

--q34--

select * from t_exposant_exp where exp_id=50 ;

--q35--
SELECT oev_intitule , oev_image  FROM `t_oeuvre_oev` 
WHERE oev_id in ( select oev_id FROM t_presentation_pre  group by oev_id having count(exp_id) > 1) ;

--q36--

select * from t_oeuvre_oev ;

--q37--
select exp_id from t_presentation_pre where oev_id in (
SELECT oev_id  from t_presentation_pre
group by oev_id
having count(exp_id) > 1 ;


--q38-- 

delete from t_exposant_exp where exp_id in (

select exp_id from t_presentation_pre
except 
select exp_id from t_presentation_pre where oev_id in (
SELECT oev_id  from t_presentation_pre
group by oev_id
having count(exp_id) > 1 ) ) ;

-- q39 -- 

delete from t_presentaion where oev_id = 12  ;

delete from t_oeuvre_oev where oev_id =12  ;

--q40--

UPDATE `t_oeuvre_oev` SET `oev_intitule`='Alaia_Tati',`oev_date`=1991,`oev_description`='c\'est une combinaison de la collaboration de la maison alaia avec la marque de distribution TATI. la pièce est faite de tissu avec un gros motif pied-de-coq rose et blanc célèbre de la marque Tati.Ce motif, associé à certains quartiers populaires où la vie de la rue était vivante et animée.',`oev_image`='C:\Users\USER\L2_info_S4\dvp_application_web\images\oeuvres\alaia-tati.jpg' WHERE id_oev=13 ;

UPDATE `t_exposant_exp` SET `exp_id`=NULL,`exp_nom`='Iribe',`exp_prenom`='Paul',`exp_text_biographique`='Joseph-Paul Iribe né le 8 juin 1883 à Angoulême et mort le 21 septembre 1935 à Roquebrune est un dessinateur, illustrateur de mode, affichiste, patron de presse, réalisateur et décorateur français',`exp_mail`=NULL,`exp_URL`=NULL,`exp_image`='C:\Users\USER\L2_info_S4\dvp_application_web\images\exposants\paul_Iribe.jpg',`cpt_pseudo`='institut_mode_Paris' WHERE exp_id=57 ;

--q41--

insert into t_presentation_pre values (57,12) ;

delete from t_presentation_pre where exp_id=56 and oev_id =8 ;

--q42-- 

delete from t_oeuvre_oev  where oev_id not in ( select oev_id from t_presentation_pre ) ;

delete from t_exposant_exp where exp_id not in ( select exp_id from t_presentation_pre ) ;

-- nombre de compte de profils --

select count(*) as nombre_de_ligne from t_profil_pfl ;

													
													

