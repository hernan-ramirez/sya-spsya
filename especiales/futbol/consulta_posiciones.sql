SELECT DISTINCT(p.id_primer_club),
       c.alias AS Equipo
FROM `futbol_partidos` p
     LEFT JOIN `futbol_clubes` c ON(c.id = p.id_primer_club)
     
     LEFT JOIN (
          SELECT pe.id_primer_club, COUNT(1) AS pjL
          FROM `futbol_partidos` pe
          WHERE pe.id_torneo = 8 AND
          pe.grupo = 1 AND
          pe.orden_llave = 0
          GROUP BY pe.id_primer_club
     ) pj ON(pj.id_primer_club = p.id_primer_club)
     
WHERE
p.id_torneo = 8 AND
p.grupo = 1 AND
p.orden_llave = 0
