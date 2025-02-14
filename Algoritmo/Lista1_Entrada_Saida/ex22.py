import math
print('-' * 5, 'QUANTOS INGRESSOS SERÃO NECESSÁRIO VENDER', '-' * 5)
valor_espetaculo = float(input("Quanto custou para contratar um espetáculo teatral: R$ "))
valor_ingresso = float(input('Qual é o valor do ingresso: R$ '))
ingresso_nessecario = valor_espetaculo / valor_ingresso
print(f'Vai ser necesaário vender {round(ingresso_nessecario)} ingressos, à um valor de R$ {valor_ingresso:.2f}, para cubrir o custo de contratação.')
