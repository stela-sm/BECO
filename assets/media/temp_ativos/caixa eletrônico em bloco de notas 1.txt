n2 =5
n5 = 5
n10 = 10
n20 = 20
n50 = 50
n100 = 100
n200 = 200
#total na conta#
saldo = 10000

cn5 = 0
cn2 = 0
cn = 0
saque = 0

print("--------------------------------")
print("Bem-vindo ao Banco")
print("--------------------------------")

saque = int(input("Bem Vindo ao banco quanto você gostaria de sacar?"))
while saque > saldo:
        print(f"Retirada não autorizada.\nValor superior ao que está na conta. Valor disponivel R${saldo}")
        saque = int(input("Quanto quer sacar?"))

if saque ==(1, 3):
    print(f"Retirada não autorizada.\ninsuficiente para distrinuição de notas. Valor disponivel R${saldo}")
    saque = int(input("Quanto quer sacar?"))

if saque %2 !=0:
    while saque %5 > 0:
        saque -= 2
        cn2 += 1
    saque -= 5
    cn5 +=1

duzentos = min(saque // 200, n200)
saque -= duzentos * 200
cem = min(saque // 100, n100)
saque -= cem * 100
cinquenta = min(saque // 50, n50)
saque -= cinquenta * 50
vinte = min(saque // 20, n20)
saque -= vinte * 20
dez = min(saque // 10, n10)
saque -= dez * 10
cinco = min(saque // 5, n5)
saque -= cinco * 2
dois = min(saque // 2, n2)
saque -= dois * 10
if duzentos > 0:
    print('Notas R$200,00 =', duzentos)
if cem > 0:
    print('Notas R$100,00 =', cem)
if cinquenta > 0:
    print('Notas R$50,00 =', cinquenta)
if vinte > 0:
    print('Notas R$20,00 =', vinte)
if dez > 0: 
    print('Notas R$10,00 =', dez)
if cn5 or cinco > 0: 
    print('Notas R$5,00 =', cn5 or cinco)
if cn2 or dois> 0:    
    print('Notas R$2,00 =', cn2 or dois)