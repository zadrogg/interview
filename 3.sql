/**
 * Имеем следующие таблицы:
 * users — контрагенты
 * id
 * name
 * phone
 * email
 * created — дата создания записи
 * orders — заказы
 * id
 * subtotal — сумма всех товарных позиций
 * created — дата и время поступления заказа (Y-m-d H:i:s)
 * city_id — город доставки
 * user_id
 *
 * Необходимо выбрать одним запросом список контрагентов в следующем формате (следует учесть, что будет включена опция only_full_group_by в MySql):
 * Имя контрагента
 * Его телефон
 * Сумма всех его заказов
 * Его средний чек
 * Дата последнего заказа
 */
 with last_order as (
     select created, user_id
     from orders
     order by created desc
     limit 1
 )
select u.name, u.phone, sum(o.subtotal) as total, avg(o.subtotal) as average_check, lo.created
from users as u
left join orders as o on u.id = o.user_id
left join last_order as lo on u.id = lo.user_id
group by u.name, u.phone, total, average_check, lo.created