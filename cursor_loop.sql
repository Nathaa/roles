-- FUNCTION: public.cursor_loop(bigint)

-- DROP FUNCTION public.cursor_loop(bigint);

CREATE OR REPLACE FUNCTION public.cursor_loop(
	pid bigint)
    RETURNS character varying
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
AS $BODY$
DECLARE
    VALOR        character varying;
    cur_MATERIAS CURSOR(PID bigint) FOR SELECT B.NOMBRE 
                              FROM asignacions A LEFT JOIN MATERIAS B ON(B.ID=A.MATERIAS_ID)
                       WHERE a.GRADOS_ID=PID
					     and a.materias_id is not null
                 ORDER BY B.nombre;
BEGIN
   for x in cur_MATERIAS(PID)
   LOOP
        VALOR= concat(VALOR,concat(x.NOMBRE,','));
   END LOOP;   
   RETURN VALOR;
END
$BODY$;

ALTER FUNCTION public.cursor_loop(bigint)
    OWNER TO pktalrtbrkjuut
