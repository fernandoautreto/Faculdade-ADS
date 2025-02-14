print('-' * 5, 'SALDO CONTA BANCÁRIA', '-' * 5)
deposito = float(input('Qual é o valor do depósito: R$ '))
cheque1 = float(input("Qual o valor do primeiro cheuqe: R$ "))
cheque2 = float(input('Qual o valor do segundo cheque: R$ '))
impost1 = cheque1 * 0.38 / 100
impost2 = cheque2 * 0.38 / 100
saque1 = cheque1 + impost1
saque2 = cheque2 + impost2
saldo = deposito - saque1 - saque2
print('Seu saldo disponível é: R$ {}'.format(saldo))
