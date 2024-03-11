/**
 * Имеем следующую таблицу со списком сотрудников
 * Id    Name    LastName    DepartamentId    Salary
 * 1    Иван     Смирнов        2             100000
 * 2    Максим   Петров         2             90000
 * 3    Роман    Иванов         3             95000
 *
 * Написать запрос для вывода самой большой зарплаты в каждом департаменте
 * Написать запрос для вывода списка сотрудников из 3-го департамента у которых ЗП больше 90000
 * Написать запрос по созданию индексов для ускорения
 */
 with emp as (
    select *
    from employees
    order by Salary desc
    limit 1
 )
 select Name, LastName, DepartamentId, Salary
 from departaments as d
 inner join emp on d.id = emp.DepartamentId


 select *
 from employees
 where DepartamentId = 3 and Salary > 90000


 create index idx_salary on employees (Salary)
 create index idx_department_id on employees (DepartamentId)