## Lazy Initialization

Lazy Initialization - нужна для управлением работы ресурсоемких задач. В примере разбор url ("ресурсоемкая задача":) происходит только в момент вызвова getDomain(), а в момент вызова LazyURL происходит только подготовка.