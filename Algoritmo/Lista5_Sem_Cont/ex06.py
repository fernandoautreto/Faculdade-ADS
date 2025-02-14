# Faça um programa que vários valores inteiros, calcule e exiba o maior e o menor valor do conjunto.
# Para encerrar a entrada de dados, deve ser digitado o valor zero;
# Para valores negativos, deve ser enviada uma mensagem;
# Esses valores (zero e negativos) não entrarão na lógica de encontrar o maior e o menor valor.

n = int(input('Digite um número intero: '))
n_maior = n_menor = n
while n != 0:
    if n > n_maior:
        n_maior = n
    if n < n_menor and n > 0:
        n_menor = n
    if n < 0:
        print('Esses valores (zero e negativos) não entrarão na lógica de encontrar maior e menor valor.')
    n = int(input('Digite um número intero e ZERO para encerrar: '))
print(n_maior, n_menor,)
