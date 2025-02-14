# No final do ano muitas pessoas compram presentes. Para identificar o perfil dos compradores numa loja de roupas, faça um programa que registre os dados de algumas pessoas, pergunte “Deseja cadastrar outro (‘s’/’n’)?”. Enquanto a resposta for s repete, quando for n encerra e repetição e apresente os seguintes resultados:
# a) Quantidade de pessoas de gênero f - feminino e m - mesculino;

# b) Quantidade de pessoas de gênero feminino abaixo e acima de 18 anos

# c) Quantidade de pessoas de gênero masculino abaixo e acima de 18 anos

# Observaçãos: use as letras f/m na condição da estrutura de decisão
m = 0
f = 0
m_maior_18 = 0
m_menor_18 = 0
f_maior_18 = 0
f_menor_18 = 0
cadastrar = input('Deseja cadastrou outro? (S/N): ')
while cadastrar == "S" or cadastrar == 's':
    genero = input('Qual é o sexo (M/F): ')
    if genero == 'M' or genero == 'm':
        m += 1
        idade = int(input('Qual a idade: '))
        if idade >= 18:
            m_maior_18 += 1
        if idade < 18:
            m_menor_18 += 1

    if genero == 'F' or genero == 'f':
        f += 1
        idade = int(input('Qual a idade: '))
        if idade >= 18:
            f_maior_18 += 1
        if idade < 18:
            f_menor_18 += 1

    cadastrar = input('Deseja cadastrou outro? (S/N): ')

print(f'Foram cadastrado {m} homens e {f} mulhres.')
print(
    f'Dos homens cadastrados {m_maior_18} eram maiores de 18 anos e {m_menor_18} eram menores de 18 anos.')
print(
    f'Das mulheres cadastradas {f_maior_18} eram amiores de 18 anos e {f_menor_18} eram menores de 18 anos.')
