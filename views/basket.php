<h2>Корзина</h2>


{% for item in basket %}
    <h2><a href="/product/card/?id={{ item.id }}">{{ item.name }}</a></h2>
    <p>{{ item.description }}</p>
    <p>Цена: {{ item.price }}</p>
    <button data-id="{{ item.id }}" class="buy">Купить</button>
    <hr>
{% endfor %}

