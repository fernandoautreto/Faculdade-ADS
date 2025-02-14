print('-' * 5, 'CALCULO DE MINUTOS', '-' * 5)
hora = float(input("Digite a hora (no formato hh.mm): "))
parte_inteira = int(hora)
parte_decimal = hora - parte_inteira
minutos = parte_decimal * 100
total_minutos = parte_inteira * 60 + minutos
print(f"A hora digitada em minutos é: {total_minutos} minutos")