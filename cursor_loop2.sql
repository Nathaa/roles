-- FUNCTION: public.cursor_loop2(bigint)

-- DROP FUNCTION public.cursor_loop2(bigint);

CREATE OR REPLACE FUNCTION public.cursor_loop2(
	pid bigint)
    RETURNS character varying
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
AS $BODY$
DECLARE
    VALOR        character varying;
    cur_MATERIAS CURSOR(PID bigint) FOR SELECT B.NOMBRE_periodo 
                              FROM asignacions A LEFT JOIN PERIODOS B ON(B.ID=A.PERIODOS_ID)
                       WHERE a.GRADOS_ID=PID
					     and a.periodos_id is not null
                 ORDER BY B.NOMBRE_periodo;
BEGIN
   for x in cur_MATERIAS(PID)
   LOOP
        VALOR= concat(VALOR,concat(x.NOMBRE_periodo,','));
   END LOOP;   
   RETURN VALOR;
END
$BODY$;

ALTER FUNCTION public.cursor_loop2(bigint)
    OWNER TO pktalrtbrkjuut
