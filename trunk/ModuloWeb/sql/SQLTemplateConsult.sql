-- Procure por todas as informações dos imóveis
-- junto com suas informações relacionadas.
SELECT
  it.tipo, tc.tipo, c.nome, e.nome, e.uf, i.*
FROM
  imovel i
LEFT JOIN (imovel_tipo it, tipo_contrato tc, cidade c, estado e)
ON (i.imovel_tipo = it.id AND i.tipo_contrato = tc.id AND i.cidade = c.id AND c.id = e.id);

-- =======================================================================================
-- For distances in kilometers multiply for 6380.
-- For distances in miles multiply for 3959.
SELECT
  `it`.`tipo` AS imovel_tipo,
  `tc`.`tipo` AS contrato_tipo,
  `i`.`bairro`,
  `i`.`endereco`,
  `i`.`numero`,
  ACOS( COS( RADIANS( `latitude` ) ) * COS( RADIANS('-22.236651') )
        * COS( RADIANS( `longitude` ) - RADIANS( '-45.943862' ) )
        + SIN( RADIANS( `latitude` ) ) * SIN( RADIANS( '-22.236651' )))
        * 6380 AS `distance`

FROM
  imovel i
  LEFT JOIN (imovel_tipo it, tipo_contrato tc)
  ON(i.imovel_tipo = it.id AND i.tipo_contrato = tc.id)


WHERE  ACOS( COS( RADIANS( `latitude` ) ) * COS( RADIANS('-22.236651') )
        * COS( RADIANS( `longitude` ) - RADIANS( '-45.943862' ) )
        + SIN( RADIANS( `latitude` ) ) * SIN( RADIANS( '-22.236651' )))
        * 6380 < 1

ORDER BY `distance`;