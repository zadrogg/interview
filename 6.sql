with evaluations (
    select
        department_id
    from 
        evaluations
    where  
        gender = true
        AND
        value = 5
)

select
    *
from 
    departments, evaluations
where
    departments.id = evaluations.department_id
