n = int(input('Digite um número: '))
if n % 2 == 0:
    tipo_numero = "par"
else:
    tipo_numero = "ímpar"

if n > 0:
    sinal_numero = "positivo"
elif n < 0:
    sinal_numero = "negativo"
else:
    sinal_numero = "nulo"
print(f"O número {n} é {tipo_numero} e {sinal_numero}.")